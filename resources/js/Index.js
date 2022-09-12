import React from 'react';
import { Route, Link, Switch, BrowserRouter as Router } from 'react-router-dom'
import NewsFeed from './components/NewsFeed';
import Post from './components/Post';
import Nav from './components/Nav';

export default function Index() {
    return (
        <Router className="container">
            <div>
                <Nav />
                <Switch>
                    <Route exact path="/" component={NewsFeed} />
                    <Route path="/post" component={Post} />
                    {/* <NewsFeed /> */}
                    {/* <Post /> */}
                </Switch>
            </div>
        </Router>
    );
}