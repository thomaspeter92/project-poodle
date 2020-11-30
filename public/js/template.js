function adjustFooter() {
    const body = document.querySelector("body");
    const templateContent = document.querySelector("#templateContent");
    const footer = document.querySelector("footer");
    
    const contentBottom = templateContent.offsetTop + templateContent.offsetHeight;
    const viewportHeight = tempContainer.offsetHeight;
    const footerTop = footer.offsetTop;
    const footerBottom = footer.offsetTop + footer.offsetHeight;
    
    if (footerBottom < viewportHeight) {
        body.style.position = "relative";
        body.style.height = "100vh";
        footer.style.position = "absolute";
        footer.style.bottom = 0;
        footer.style.width = "100%";
    } else if (footerTop < contentBottom) {
        body.removeAttribute("style");
        footer.removeAttribute("style");
    }
}

{
    const body = document.querySelector("body");
    const tempContainer = document.querySelector("#tempContainer");
    const footer = document.querySelector("footer");
    const viewportHeight = tempContainer.offsetHeight;
    const footerBottom = footer.offsetTop + footer.offsetHeight;

    if (footerBottom < viewportHeight) {
        body.style.position = "relative";
        body.style.height = "100vh";
        footer.style.position = "absolute";
        footer.style.bottom = 0;
        footer.style.width = "100%";
    }

    window.addEventListener("resize", () => {
        adjustFooter();
    });
};