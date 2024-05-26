import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import './BlogList.css';

const BlogList = () => {
    const [posts, setPosts] = useState([]);

    useEffect(() => {
        axios.get('/api/posts').then(response => {
            setPosts(response.data);
        });
    }, []);

    return (
        <div className="blog-list">
            <h2>Blog Posts</h2>
            {posts.map(post => (
                <div className="blog-preview" key={post._id}>
                    <Link to={`/post/${post._id}`}>
                        <h2>{post.title}</h2>
                        <p>{post.content.substring(0, 100)}...</p>
                    </Link>
                </div>
            ))}
        </div>
    );
};

export default BlogList;