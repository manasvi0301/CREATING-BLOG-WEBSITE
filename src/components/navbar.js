import React from 'react';
import { Link } from 'react-router-dom';
import './Navbar.css';

const Navbar = () => {
    return (
        <nav className="navbar">
            <h1>Blog Website</h1>
            <div className="links">
                <Link to="/">Home</Link>
                <Link to="/create">Create New Blog</Link>
            </div>
        </nav>
    );
};

export default Navbar;
