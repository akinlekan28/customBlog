/**
 * Created by Akinlekan on 3/28/2017.
 */

function checkAuthor() {
    var author = document.querySelector("input[name='author']");
    var authorWarning = document.querySelector("form #author-warning");

    if (author.value === "") {
        event.preventDefault();
        authorWarning.innerHTML = "*Author's name can't be empty";
    }
}

function checkTitle() {
    var title = document.querySelector("input[name='title']");
    var titleWarning = document.querySelector("form #title-warning");

    if (title.value === "") {
        event.preventDefault();
        titleWarning.innerHTML = "*Your Entry title can't be empty";
    }
}

function checkEntry() {
    var entry = document.querySelector("textarea[name='entry']");
    var entryWarning = document.querySelector("form #entry-warning");

    if (entry.value === "") {
        event.preventDefault();
        entryWarning.innerHTML = "*Entry field can't be empty";
    }
}

function init() {
    var editorForm = document.querySelector("form#editor");
    var author = document.querySelector("input[name='author']");
    var title = document.querySelector("input[name='title']");
    var entry = document.querySelector("textarea[name='entry']");

    author.required = false;
    title.required = false;
    entry.required = false;
    editorForm.addEventListener("submit", checkAuthor, false);
    editorForm.addEventListener("submit", checkTitle, false);
    editorForm.addEventListener("submit", checkEntry, false);
}

document.addEventListener("DOMContentLoaded", init, false);
