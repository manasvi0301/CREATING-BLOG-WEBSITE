let posts = [];
let currentEditId = null;

function createPost() {
    const title = document.getElementById('title').value;
    const content = document.getElementById('content').value;

    if (title && content) {
        const post = {
            id: posts.length + 1,
            title: title,
            content: content
        };

        posts.push(post);
        document.getElementById('title').value = '';
        document.getElementById('content').value = '';

        renderPosts();
    } else {
        alert('Please enter both title and content.');
    }
}

function renderPosts() {
    const postsDiv = document.getElementById('posts');
    postsDiv.innerHTML = '';

    posts.forEach(post => {
        const postDiv = document.createElement('div');
        postDiv.className = 'post';
        postDiv.innerHTML = `
            <h2>${post.title}</h2>
            <p>${post.content}</p>
            <button class="edit-btn" onclick="editPost(${post.id})">Edit</button>
            <button onclick="confirmDeletePost(${post.id})">Delete</button>
        `;
        postsDiv.appendChild(postDiv);
    });
}

function confirmDeletePost(id) {
    if (confirm('Are you sure you want to delete this post?')) {
        deletePost(id);
    }
}

function deletePost(id) {
    posts = posts.filter(post => post.id !== id);
    renderPosts();
}

function editPost(id) {
    const post = posts.find(post => post.id === id);
    currentEditId = id;
    document.getElementById('edit-title').value = post.title;
    document.getElementById('edit-content').value = post.content;

    openModal();
}

function openModal() {
    document.getElementById('modal').style.display = 'block';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

function saveEdit() {
    const title = document.getElementById('edit-title').value;
    const content = document.getElementById('edit-content').value;

    if (title && content) {
        const post = posts.find(post => post.id === currentEditId);
        post.title = title;
        post.content = content;

        closeModal();
        renderPosts();
    } else {
        alert('Please enter both title and content.');
    }
}

window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if (event.target === modal) {
        closeModal();
    }
}

document.addEventListener('DOMContentLoaded', () => {
    renderPosts();
});
