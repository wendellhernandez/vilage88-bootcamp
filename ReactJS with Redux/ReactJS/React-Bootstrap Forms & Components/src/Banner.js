import Alert from 'react-bootstrap/Alert';
import Badge from 'react-bootstrap/Badge';
import Carousel from 'react-bootstrap/Carousel';
import ImageReact from './assets/images/react.png';
import ImageRuby from './assets/images/ruby.jpg';
import ImageSelenium from './assets/images/selenium.jpg';
import Container from 'react-bootstrap/Container';
import Nav from 'react-bootstrap/Nav';
import Navbar from 'react-bootstrap/Navbar';
import NavDropdown from 'react-bootstrap/NavDropdown';

const Banner = () => {
    return (  
        <div className="hero">
            <Navbar expand="lg" className="bg-body-tertiary">
            <Container>
                <Navbar.Brand href="#home">Village69</Navbar.Brand>
                <Navbar.Toggle aria-controls="basic-navbar-nav" />
                <Navbar.Collapse id="basic-navbar-nav">
                <Nav className="me-auto">
                    <Nav.Link href="#home">Home</Nav.Link>
                    <Nav.Link href="#link">About Us</Nav.Link>
                    <NavDropdown title="Lessons" id="basic-nav-dropdown">
                    <NavDropdown.Item href="#action/3.1">React JS</NavDropdown.Item>
                    <NavDropdown.Item href="#action/3.2">
                        Ruby on Rails
                    </NavDropdown.Item>
                    <NavDropdown.Item href="#action/3.3">QA Track</NavDropdown.Item>
                    <NavDropdown.Divider />
                    <NavDropdown.Item href="#action/3.4">
                        Others
                    </NavDropdown.Item>
                    </NavDropdown>
                </Nav>
                </Navbar.Collapse>
            </Container>
            </Navbar>
            <Alert key='warning' variant='warning'>
            Join Our Bootcamp <Badge bg="secondary">New</Badge>
            </Alert>
            <Carousel>
                <Carousel.Item>
                    <img src={ImageReact} alt="React" />
                </Carousel.Item>
                <Carousel.Item>
                    <img src={ImageRuby} alt="Ruby" />
                </Carousel.Item>
                <Carousel.Item>
                    <img src={ImageSelenium} alt="Selenium" />
                </Carousel.Item>
            </Carousel>
        </div>
        
    );
}
 
export default Banner;