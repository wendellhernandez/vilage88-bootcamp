import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import { useState } from 'react';
import ListGroup from 'react-bootstrap/ListGroup';
import UserImage from './assets/images/user.png';

const RegistrationForm = () => {
    const [validated, setValidated] = useState(false);

    const handleSubmit = (event) => {
        const form = event.currentTarget;
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();   
        }else{
            event.preventDefault();
            event.stopPropagation(); 
        }

        setValidated(true);
    };
    
    return (  
        <div className="container">
            <Form noValidate validated={validated} onSubmit={handleSubmit}>
                <p>Order Form</p>

                <Form.Group className="mb-3">
                    <Form.Label>Customer Name</Form.Label>
                    <Form.Control type="text" placeholder="Customer Name" required id='customer'/>
                    <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </Form.Group>

                <Form.Group className="mb-3">
                    <Form.Label>Delivery Address</Form.Label>
                    <Form.Control type="text" placeholder="Delivery Address" required id='delivery'/>
                    <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </Form.Group>

                <Form.Group className="mb-3">
                    <Form.Label>Contact Number</Form.Label>
                    <Form.Control type="text" placeholder="Contact Number" required id='contact'/>
                    <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </Form.Group>

                <p>Products</p>
                
                <div key='default-checkbox' className="mb-3" id='checkbox'>
                    <Form.Check
                        type='checkbox'
                        id='tshirt'
                        label='Limited Edition V88 T-shirt'
                    />
                    <Form.Control type="text" placeholder="QTY" id='tshirtQty'/>

                    <Form.Check
                        type='checkbox'
                        id='cap'
                        label='Limited Edition V88 Cap'
                    />
                    <Form.Control type="text" placeholder="QTY" id='capQty'/>
                </div>
                
                <Button variant="primary" type="submit">
                    Register
                </Button>
            </Form>
        </div>
    );
}
 
export default RegistrationForm;