import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import { useState } from 'react';
import ListGroup from 'react-bootstrap/ListGroup';
import UserImage from './assets/images/user.png';

const RegistrationForm = () => {
    const contactName = document.getElementById('contactName');
    const email = document.getElementById('email');
    const [validated, setValidated] = useState(false);

    let [users , setUsers] = useState([]);

    let keyId = 1;
    let tempUsers = [];

    const handleSubmit = (event) => {
        const form = event.currentTarget;
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();   
        }else{
            event.preventDefault();
            event.stopPropagation(); 

            setUsers([...users , {
                name: contactName.value,
                email: email.value,
                id: keyId
            }]);
        }

        setValidated(true);
    };
    
    return (  
        <div className="container">
            <Form noValidate validated={validated} onSubmit={handleSubmit}>
                <Form.Group className="mb-3">
                <Form.Label>Name</Form.Label>
                <Form.Control type="text" placeholder="Name" required id='contactName'/>
                <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </Form.Group>

                <Form.Group className="mb-3">
                <Form.Label>Email</Form.Label>
                <Form.Control type="email" placeholder="Email" required id='email'/>
                <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </Form.Group>
                
                <Button variant="primary" type="submit">
                Register
                </Button>
            </Form>

            <ListGroup style={{marginTop: '20px'}}>
                <ListGroup.Item active>Contacts</ListGroup.Item>
                {
                    users.map((user) => (
                        <ListGroup.Item className="user" key={user.id}>
                            <img src={UserImage} alt="user" />
                            <div className="details">
                                <div className="name"><span>{user.name}</span></div>
                                <a href="google.com">{user.email}</a>
                            </div>
                        </ListGroup.Item>
                    ))
                }
            </ListGroup>
        </div>
    );
}
 
export default RegistrationForm;