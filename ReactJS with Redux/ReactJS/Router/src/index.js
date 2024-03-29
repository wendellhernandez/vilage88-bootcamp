import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import {BrowserRouter as Router,Routes,Route,Link} from 'react-router-dom';
import Home from './Home';
import AboutMe from './AboutMe';
import Gallery from './Gallery';



const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <Router>
        <div className="App">
          <ul>
            <li>
              <Link to="/">Home</Link>
            </li>
            <li>
              <Link to="/aboutMe">About Me</Link>
            </li>
            <li>
              <Link to="/gallery">Gallery</Link>
            </li>
          </ul>

          <Routes>
            <Route exact path='/' element={<Home/>}></Route>
            <Route exact path='/aboutMe' element={<AboutMe/>}></Route>
            <Route exact path='/gallery' element={<Gallery/>}></Route>
          </Routes>
        </div>
    </Router>
  </React.StrictMode>
);
