import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import InputGroup from 'react-bootstrap/InputGroup';
import FloatingLabel from 'react-bootstrap/FloatingLabel';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
import { useState } from 'react';

const RegistrationForm = () => {
    const [validated, setValidated] = useState(false);

    const handleSubmit = (event) => {
        const form = event.currentTarget;
        if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        }

        setValidated(true);
    };
    
    return (  
        <div className="container">
            <Form noValidate validated={validated} onSubmit={handleSubmit}>
                <Form.Group className="mb-3" controlId="validationCustom01">
                <Form.Label>Email address</Form.Label>
                <InputGroup className="mb-3">
                    <Form.Control
                    required
                    placeholder="Gmail"
                    />
                    <InputGroup.Text id="basic-addon2">@gmail.com</InputGroup.Text>
                </InputGroup>
                <Form.Text className="text-muted">
                    We'll never share your email with anyone else.
                </Form.Text>
                <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </Form.Group>

                <Form.Group className="mb-3" controlId="formBasicPassword">
                <Form.Label>Password</Form.Label>
                <Form.Control type="password" placeholder="Password" required/>
                <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </Form.Group>
                <Form.Group className="mb-3" controlId="formBasicRadio">
                <Form.Check
                    inline
                    label="Male"
                    name="Gender"
                    type="radio"
                />
                <Form.Check
                    inline
                    label="Female"
                    name="Gender"
                    type="radio"
                />
                </Form.Group>
                <Form.Select aria-label="Default select example" required>
                <option value="1">Front-end</option>
                <option value="2">Back-end</option>
                <option value="3">QA</option>
                </Form.Select>
                <Form.Label>Dev Experience</Form.Label>
                <Form.Range />
                <Row>
                <Col>
                    <Form.Control placeholder="First name" required/>
                    <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </Col>
                <Col>
                    <Form.Control placeholder="Last name" required/>
                    <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </Col>
                </Row>
                <FloatingLabel
                controlId="floatingInput"
                label="Favorite Languange"
                className="mb-3"
                >
                <Form.Control type="text" placeholder="Javascript" required/>
                <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </FloatingLabel>
                <Button variant="primary" type="submit">
                Register
                </Button>
            </Form>
        </div>
    );
}
 
export default RegistrationForm;