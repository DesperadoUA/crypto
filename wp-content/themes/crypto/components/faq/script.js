{
    function faq() {
        const faqAccordions = document.querySelectorAll('.faq_question')
        if(faqAccordions.length) {
            faqAccordions.forEach(item => {
                item.addEventListener('click', function () {
                    if(this.classList.contains('faq_active')) {
                        this.classList.remove('faq_active')
                        this.nextElementSibling.classList.remove('fadeIn')
                    }
                    else {
                        this.classList.add('faq_active')
                        this.nextElementSibling.classList.add('fadeIn')
                    }
                })
            })
        }
    }
    faq()
}