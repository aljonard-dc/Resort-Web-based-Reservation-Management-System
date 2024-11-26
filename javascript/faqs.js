const faqTogglers = document.querySelectorAll(".faq");

faqTogglers.forEach(faqTogglers =>{
    faqTogglers.addEventListener("click", () =>{
        faqTogglers.classList.toggle("active")
    })
})