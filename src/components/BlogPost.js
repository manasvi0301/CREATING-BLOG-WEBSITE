import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import './BlogPost.css';

const BlogPost = ({ match }) => {
    const [post, setPost] = useState({});

    useEffect(() => {
        axios.get(`/api/posts/${match.params.id}`).then(response => {
            setPost(response.data);
        });
    }, [match.params.id]);

    const handleDelete = () => {
        axios.delete(`/api/posts/${match.params.id}`).then(() => {
            window.location.href = '/';
        });
    };

    return (
        <div className="blog-post">
            <h1>{post.title}</h1>
            <p>{post.content}</p>
            <button onClick={handleDelete}>Delete</button>
            <Link to={`/update/${post._id}`}>Edit</Link>
        </div>
    );
};

export default BlogPost;
