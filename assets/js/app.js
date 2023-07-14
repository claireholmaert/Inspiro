import '../css/app.scss';
import 'tailwindcss/tailwind.css';
import 'tw-elements';

document.addEventListener('DOMContentLoaded', () => {
    new App();
});

class App {
    constructor() {
        this.enableDropDown();
    }
    enableDropDown() {
        const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
        dropdownElementList.map(function (dropdownToggleEl) {
            return new Dropdown(dropdownToggleEl)
        });
    }

    handleCommentForm() {

        const commentForm = document.querySelector('form.comment-form')

        if (null === commentForm) {
            return;
        }

        commentForm.addEventListener('submit', async (event) => {
            event.preventDefault();

            const response = await fetch('/ajax/comment', {
                method: 'POST',
                body: new FormData(event.target)
            })

            if (!response.ok) {
                return;
            }

            const json = await response.json();
            if (json.code === 'COMMENT_ADDED_SUCCESSFULY') {
                const commentList = document.querySelector('.comment-list');
                const commentCount = document.querySelector('.comment-count');
                const commentContent = document.querySelector('#comment-content');
                commentList.insertAdjacentElement('beforeend', json.message);
                commentList.lastElementChild.scrollIntoView();
                commentCount.innertext = json.numberOfComments;
                commentContent.value = '';
            }
        });

    }
}




