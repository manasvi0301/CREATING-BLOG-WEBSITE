import React from 'react';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import Navbar from './components/navbar';
import BlogList from './components/BlogList';
import BlogPost from './components/BlogPost';
import CreatePost from './components/CreatePost';
import UpdatePost from './components/UpdatePost';
import './App.css';

const App = () => {
    return (
        <Router>
            <div className="App">
                <Navbar />
                <div className="content">
                    <Switch>
                        <Route exact path="/" component={BlogList} />
                        <Route path="/post/:id" component={BlogPost} />
                        <Route path="/create" component={CreatePost} />
                        <Route path="/update/:id" component={UpdatePost} />
                    </Switch>
                </div>
            </div>
        </Router>
    );
};

export default App;
