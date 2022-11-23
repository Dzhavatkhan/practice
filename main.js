async function getPost() {

    let res1 = await fetch('http://practice/posts/author');
    let posts1 = await res1.json();

    await posts1.forEach((post) => {
            document.querySelector('.all-cards').innerHTML +=
                `<div class="card">
                <div class="card-body">
                    <h5 class="card-name">Автор(ы): ${post.name} ${post.surname}</h5>
                    <p class="card-namebook">Название книги: ${post.namebook}</p>
<!--                    <div class="link-block"><a href="#" class="card-info" data-id="${post.id}" onclick="getPosts_author(${post.id})">Подробнее</a></div>-->
                    <a href="info.php?id=${post.id}">Подробнее</a>
                </div>
            </div>`
        }
    );
    const full_btn = document.querySelectorAll('.card-info');

    full_btn.forEach((value, key, parent) => {
        parent[key].onclick = () => {
            let id = parent[key].getAttribute('data-id');
            fetch('http://practice/posts/author/' + id)
                .then((response) => response.json())
                .then((response) => {
                    document.querySelector('.all-cards').innerHTML = `
                    <div class="cont">
                    <div class="post-full">
                    
                    <h5 class="card-name">Автор(ы): ${response.name} ${response.surname}</h5>
                    
                    <p class="card-namebook">Название книги: ${response.namebook}</p>
                    
                    <p class="description">Краткое описание: ${response.description}</p>
                    
                    <h1>Оставьте отзыв о товаре</h1>
                     
                    <form action="grade.php" method="post">
                        <label>Ваша оценка</label>
                        <div class="rating-area">
                            <input type="radio" id="star-5" name="rating" value="5">
                            <label for="star-5" title="Оценка «5»"></label>\t
                            <input type="radio" id="star-4" name="rating" value="4">
                            <label for="star-4" title="Оценка «4»"></label>    
                            <input type="radio" id="star-3" name="rating" value="3">
                            <label for="star-3" title="Оценка «3»"></label>  
                            <input type="radio" id="star-2" name="rating" value="2">
                            <label for="star-2" title="Оценка «2»"></label>    
                            <input type="radio" id="star-1" name="rating" value="1">
                            <label for="star-1" title="Оценка «1»"></label>
                        </div>

                    <label>Отзыв</label>
                        <textarea name="text"></textarea>
                        <button type="submit">Отправить</button>
                    </form>
                    <a href="#" class="back-info" onclick="clearbbb()">Назад</a>
                    
                    </div>
                    </div>
                    `;

                })

        }
    });
}
async function clearbbb() {
    let res1 = await fetch('http://practice/posts/author', {
        method: 'GET',
    });
    let posts1 = await res1.json();
    document.querySelector('.all-cards').innerHTML = ``;
    getPost();
}
async function addPost() {
    const title = document.getElementById('title').value,
        body = document.getElementById('body').value;

    let formData = new FormData();
    formData.append('title', title);
    formData.append('body', body);

    const res = await fetch('http://api-blog/posts/', {
        method: 'POST',
        body: formData
    });
    const data = await res.json();
    console.log(data);
    document.querySelector('.post-list').innerHTML = '';
    getPost();
}

async function deletePost(id) {

    if (confirm('Подтвердите действие')) {

        const res = await fetch(`http://api-blog/posts/${id}`, {
            method: 'DELETE'
        });
        const data = await res.json();
        if (data.status === true) {
            document.querySelector('.post-list').innerHTML = '';
            await getPost();

        }

    }

}

async function updatePost(id) {

    const update_window = document.querySelector('.window');
    update_window.style.display = 'block';
    const close_btn = update_window.querySelector('.close');
    const update_btn = update_window.querySelector('.save');
    close_btn.onclick = () => {
        update_window.style.display = 'none';
    }
    update_btn.onclick = async () => {
        const title_value = await update_window.querySelector('#update_title').value;
        const content_value = await update_window.querySelector('#update_content').value;


        const res = await fetch(`http://api-blog/posts/${id}`, {
            method: 'PATCH',
            body: JSON.stringify({
                title: title_value,
                body: content_value
            }),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            }
        })
        let data = await res.json();

        if (data.status === true) {
            document.querySelector('.post-list').innerHTML = '';
            await getPost();
            update_window.style.display = 'none';
        }

    }

}
getPost();