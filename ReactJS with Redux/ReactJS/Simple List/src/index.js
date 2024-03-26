import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';

import Luffy from './assets/images/luffy.jpg';
import Zoro from './assets/images/zoro.jpg';
import Sanji from './assets/images/sanji.jpg';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
    <div className="App">
        <div className="comment">
            <img src={Luffy} alt='Luffy'/>
            <div className="details">
                <div className="name"><span>Monkey D. Luffy</span> January 25, 2022 3:00 PM</div>
                <p>React is amazing!</p>
            </div>
        </div>

        <div className="comment">
            <img src={Zoro} alt='Luffy'/>
            <div className="details">
                <div className="name"><span>Roronoa Zoro</span> January 25, 2022 3:30 PM</div>
                <p>This website is cool!</p>
            </div>
        </div>

        <div className="comment">
            <img src={Sanji} alt='Luffy'/>
            <div className="details">
                <div className="name"><span>Vinsmoke Sanji</span> January 25, 2022 4:00 PM</div>
                <p>I love ReactJS!</p>
            </div>
        </div>
    </div>
);
