let translations = {
    "en": {
    "nav_home": "Home",
    "nav_courses": "Courses",
    "nav_portfolio": "Portfolio",
    "nav_news": "News",
    "nav_events": "Events",
    "nav_about_us": "About Us",
    "nav_contact_us": "Contact Us",
    "nav_ai_assistant": "AI Assistant",
    "nav_login": "Log in",
    "hero_title": "Build Your <span class='deff'>Website</span> In Smart Way",
    "hero_subtitle": "Start your career with the most skilled programmers and designers<br>The best solution to success",
    "hero_last_subtitle": "The best solution to success",
    "online_title": "Online Classes With Professional Instructors",
    "online_desc": "Our Courses Cover All Fields In Programming World, From Beginner To Advanced Levels.<br>Learn With Expert Guidance To Build Your Career",
    "what_we_provide": "What We Provide To You ......",
    "feature1": "Comprehensive Courses",
    "feature2": "Expert Instructors",
    "feature3": "Weekly Projects",
    "feature4": "Community Support",
    "feature5": "Certification",
    "course1": "Ai Engineer Course",
    "course2": "Java Programming Language",
    "course3": "Machine Learning Course",
    "course4": "Laravel 10 Course",
    "view_more": "View more",
    "portfolio_title": "Our Portfolio",
    "Our Courses": "Our Courses",
    "testimonial_title": "See What Our Students Say .....",
    "testimonial_feedback": "This Course Is Awesome I Went From Knowing Nothing About Coding To Landing My First Job As A Frontend Developer Within 6 Months",
    "testimonial_name": "Ahmed Salem",
    "course_level_advanced": "Advanced Level",
    "course_level_medium": "Medium Level",
    "course_level_beginner": "Beginner Level",
    "course_duration_ai": "34 Hours • 22 Lectures",
    "course_price_free": "Free"
},
    "ar": {
    "nav_home": "الصفحة الرئيسية",
    "nav_courses": "الدورات",
    "nav_portfolio": "أعمالنا",
    "nav_news": "الأخبار",
    "nav_events": "الأحداث",
    "nav_about_us": "من نحن",
    "nav_contact_us": "اتصل بنا",
    "nav_ai_assistant": "مساعد ذكي",
    "nav_login": "تسجيل الدخول",
    "hero_title": "أنشئ <span class='deff'>موقعك</span> بطريقة ذكية",
    "hero_subtitle": "ابدأ مسيرتك مع أفضل المبرمجين والمصممين<br>أفضل طريق للنجاح",
    "hero_last_subtitle": "الحل الأفضل للنجاح",
    "online_title": "دورات أونلاين مع محترفين",
    "online_desc": "دوراتنا تغطي جميع مجالات البرمجة، من المستوى المبتدئ حتى المتقدم.<br>تعلم بإشراف الخبراء لبناء مسيرتك",
    "what_we_provide": "ماذا نوفر لك ......",
    "feature1": "الدورات الشاملة",
    "feature2": "مدرسين خبراء",
    "feature3": "المشاريع الاسبوعية",
    "feature4": "دعم مجتمعي",
    "feature5": "شهادة",
    "course1": "دورة مهندس الذكاء الاصطناعي",
    "course2": "لغة جافا للبرمجة",
    "course3": "دورة تعلم الآلة",
    "course4": "دورة لارافيل 10",
    "view_more": "عرض المزيد",
    "portfolio_title": "أعمالنا",
    "Our Courses": "دوراتنا",
    "testimonial_title": "ماذا قال طلابنا .....",
    "testimonial_feedback": "هذه الدورة رائعة، انتقلت من شخص لا يعرف شيئاً عن البرمجة إلى الحصول على أول وظيفة كمطور واجهات أمامية خلال 6 أشهر",
    "testimonial_name": "أحمد سالم",
    "course_level_advanced": "مستوى متقدم",
    "course_level_medium": "مستوى متوسط",
    "course_level_beginner": "مستوى مبتدئ",
    "course_duration_ai": "٣٤ ساعة • ٢٢ محاضرة",
    "course_price_free": "مجاناً"
}
};

    const languageSelector = document.getElementById('language');

    // Handle language change event
    languageSelector.addEventListener('change', (e) => {
        const selectedLang = e.target.value;
        translatePage(selectedLang);
    });

        // Function to translate page content based on selected language
        function translatePage(lang) {
        const elements = document.querySelectorAll('[data-key]');
        elements.forEach(el => {
        const key = el.getAttribute('data-key');
        if (translations[lang] && translations[lang][key]) {
        el.innerHTML = translations[lang][key];
    }
    });

        // Change page direction and font based on selected language
        if (lang === "ar") {
        // document.body.setAttribute('dir', 'rtl');
        document.body.style.fontFamily = "'Cairo', sans-serif";
    } else {
        // document.body.setAttribute('dir', 'ltr');
        document.body.style.fontFamily = "Poppins, sans-serif";
    }
}