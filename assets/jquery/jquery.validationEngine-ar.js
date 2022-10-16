
(function($){
    $.fn.validationEngineLanguage = function(){
    };
    $.validationEngineLanguage = {
        newLang: function(){
            $.validationEngineLanguage.allRules = {
                "required": { // Add your regex rules here, you can take telephone as an example
                    "regex": "none",
                    "alertText": "* هذا الحقل مطلوب",
                    "alertTextCheckboxMultiple": "* برجاء إختيار إحدى الخيارات",
                    "alertTextCheckboxe": "* هذا المربع الإختياري مطلوب",
                    "alertTextDateRange": "* كلا حقلين نطاق التاريخ مطلوبة"
                },
               
                "minSize": {
                    "regex": "none",
                    "alertText": "* على الأقل ",
                    "alertText2": " حروف مطلوبة"
                },
                "maxSize": {
                    "regex": "none",
                    "alertText": "* على الأكثر ",
                    "alertText2": " حروف مسموحة"
                },
				"groupRequired": {
                    "regex": "none",
                    "alertText": "* يجب عليك ملئ إحدى الحقول التالية",
                    "alertTextCheckboxMultiple": "* برجاء إختيار إحدى الخيارات",
                    "alertTextCheckboxe": "* هذا المربع الإختياري مطلوب"
                },
                "min": {
                    "regex": "none",
                    "alertText": "* الحد الأدنى للقيمة هو "
                },
                "max": {
                    "regex": "none",
                    "alertText": "* الحد الأقصى للقيمة هو "
                },
                
                "minCheckbox": {
                    "regex": "none",
                    "alertText": "* برجاء إختيار ",
                    "alertText2": " خيارات"
                },
                "equals": {
                    "regex": "none",
                    "alertText": "* الحقول غير متساوية"
                },
                
              
                
                "onlyNumberSp": {
                    "regex": /^[0-9\ ]+$/,
                    "alertText": "* أرقام فقط"
                },
                "onlyLetterSp": {
                    "regex": /^[a-zA-Z\ \']+$/,
                    "alertText": "* حروف فقط"
                },
                "onlyLetterAccentSp": {
                    "regex": /^[a-z\u00C0-\u017F\ ]+$/i,
                    "alertText": "* حروف فقط (مسموح بالنبرات)"
                },
                "onlyLetterNumber": {
                    "regex": /^[a-z]+$/,
                    "alertText": "* غير مسموح بحروف خاصة"
                },
				"onlyLetterMaj": {
                    "regex": /^[A-Z\ ]+$/,
                    "alertText": "أكتب الحروف الكبيرة فقط (EN MAJUSCULE) "
                },
				"onlyArabic": {
                    "regex":/^([\u0600-\u06ff\ ]|[\u0750-\u077f]|[\ufb50-\ufbc1]|[\ufbd3-\ufd3f]|[\ufd50-\ufd8f]|[\ufd92-\ufdc7]|[\ufe70-\ufefc]|[\ufdf0-\ufdfd])*$/g,
                    "alertText": "الأحرف العربية فقط "
                },
               "onlyArabicNumbre": {
                    "regex":/^([\u0600-\u06ff\ ]|[\u0750-\u077f]|[\ufb50-\ufbc1]|[\ufbd3-\ufd3f]|[\ufd50-\ufd8f]|[\ufd92-\ufdc7]|[\ufe70-\ufefc]|[\ufdf0-\ufdfd]|[0-9])*$/g,
                    "alertText": " الأرقام و الأحرف العربية فقط "
                }
                
            };
            
        }
    };

    $.validationEngineLanguage.newLang();
    
})(jQuery);
