// src/components/UpdatePost.js
import React, { useEffect, useState } from 'react';
import axios from 'axios';
import './PostForm.css';

const UpdatePost = ({ match, history }) => {
    const [title, setTitle] = useState('');
    const [content, setContent] = useState('');

    useEffect(() => {
        axios.get(`/api/posts/${match.params.id}`).then(response => {
            setTitle(response.data.title);
            setContent(response.data.content);
        });
    }, [match.params.id]);

    const handleSubmit = async (event) => {
        event.preventDefault();
        await axios.patch(`/api/posts/${match.params.id}`, { title, content });
        history.push('/');
    };

    return (
        <div className="post-form">
            <h1>Update Blog Post</h1>
            <form onSubmit={handleSubmit}>
                <input type="text" placeholder="Title" value={title} onChange={(e) => setTitle(e.target.value)} />
                <textarea placeholder="Content" value={content} onChange={(e) => setContent(e.target.value)}></textarea>
                <button type="submit">Update</button>
            </form>
        </div>
    );
};

export default UpdatePost;
