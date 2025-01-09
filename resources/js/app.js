import "./bootstrap";

import { loadJob } from "./loadJob";

document.addEventListener("alpine:init", () => {
    Alpine.data("mobileMenu", () => ({
        open: false,
        close(e) {
            if (e.target === this.$refs.panel) return;
            this.open = false;
        },
        block() {
            const body = document.querySelector("body");
            const main = document.querySelector("main");
            if (this.open) {
                body.classList.add("overflow-hidden");
                main.classList.add("pointer-events-none");
            } else {
                body.classList.remove("overflow-hidden");
                main.classList.remove("pointer-events-none");
            }
        },
    }));
});

window.addEventListener("DOMContentLoaded", () => {
    loadJob();
});
