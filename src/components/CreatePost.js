// src/components/CreatePost.js
import React, { useState } from 'react';
import axios from 'axios';
import './PostForm.css';

const CreatePost = ({ history }) => {
    const [title, setTitle] = useState('');
    const [content, setContent] = useState('');

    const handleSubmit = async (event) => {
        event.preventDefault();
        await axios.post('/api/posts', { title, content });
        history.push('/');
    };

    return (
        <div className="post-form">
            <h1>Create New Blog Post</h1>
            <form onSubmit={handleSubmit}>
                <input type="text" placeholder="Title" value={title} onChange={(e) => setTitle(e.target.value)} />
                <textarea placeholder="Content" value={content} onChange={(e) => setContent(e.target.value)}></textarea>
                <button type="submit">Create</button>
            </form>
        </div>
    );
};

export default CreatePost;
