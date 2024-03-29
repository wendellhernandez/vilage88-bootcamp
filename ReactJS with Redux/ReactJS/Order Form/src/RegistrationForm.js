import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import { useState } from 'react';

const RegistrationForm = () => {
    const buyModal = document.getElementsByClassName('buyModal');
    const[customer , setCustomer] = useState('wow');
    const[delivery , setDelivery] = useState('my address');
    const[contact , setContact] = useState('0919123123');
    const [validated, setValidated] = useState(false);

    const [products , setProducts] = useState([
        {
          id: 1,
          name: 'Limited Edition V88 T-shirt',
          checked: false,
          quantity: 1,
          price: 200
        },
        {
          id: 2,
          name: 'Limited Edition V88 Cap',
          checked: false,
          quantity: 1,
          price: 100
        }
    ])

    const productSum = () => {
        let sum = 0;

        products.filter(product => product.checked).map((product) => {
            sum += product.quantity * product.price;
            return 0;
        })

        return sum;
    }

    const handleChange = (id) => {
        buyModal[0].style.display = 'none';

        const tempProducts = products.map((product) => {
            if(product.id === id){
                return {...product , checked: !product.checked};
            }else{
                return product;
            }
        })

        setProducts(tempProducts);
    }

    const handleQuantityChange = (id , value) => {
        buyModal[0].style.display = 'none';

        const tempProducts = products.map((product) => {
            if(product.id === id && value >= 0){
                return {...product , quantity: value};
            }else{
                return product;
            }
        })

        setProducts(tempProducts);
    }

    const handleSubmit = (event) => {
        event.preventDefault();
        event.stopPropagation();

        const form = event.currentTarget;
        if (form.checkValidity() !== false) {
            buyModal[0].style.display = 'block';
        }

        setValidated(true);
    };

    return (  
        <div className="container">
            <Form noValidate validated={validated} onSubmit={handleSubmit}>
                <p>Order Form</p>

                <Form.Group className="mb-3">
                    <Form.Label>Customer Name</Form.Label>
                    <Form.Control 
                        type="text" 
                        placeholder="Customer Name" 
                        required 
                        id='customer' 
                        value={customer}
                        onChange={(e) => setCustomer(e.target.value)}/>
                    <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </Form.Group>

                <Form.Group className="mb-3">
                    <Form.Label>Delivery Address</Form.Label>
                    <Form.Control 
                        type="text" 
                        placeholder="Delivery Address" required 
                        id='delivery' 
                        value={delivery}
                        onChange={(e) => setDelivery(e.target.value)}/>
                    <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </Form.Group>

                <Form.Group className="mb-3">
                    <Form.Label>Contact Number</Form.Label>
                    <Form.Control 
                        type="text" 
                        placeholder="Contact Number" required 
                        id='contact' 
                        value={contact} 
                        onChange={(e) => setContact(e.target.value)}/>
                    <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </Form.Group>

                <p>Products</p>
                
                <div key='default-checkbox' className="mb-3" id='checkbox'>
                    {products.map((product) => (
                        <div className="productContainer" key={product.id}>
                            <Form.Check
                                type='checkbox'
                                label={product.name}
                                checked={product.checked}
                                onChange={() => handleChange(product.id)}
                            />
                            <Form.Control 
                                type="number" 
                                placeholder="QTY"
                                value={product.quantity}
                                onChange={(e) => handleQuantityChange(product.id , e.target.value)}
                            />
                        </div>
                    ))}
                </div>
                
                <Button variant="primary" type="submit">
                    Register
                </Button>
            </Form>

            <div className="buyModal">
                <h3>Order Complete</h3>
                <p>Customer name: {customer}</p>
                <p>Delivery address: {delivery}</p>
                <p>Contact #: {contact}</p>
                <p>Order Details:</p>
                {products.filter(product => product.checked).map((product) => (
                    <p key={product.id}>{product.name} x {product.quantity} = {product.quantity * product.price}</p>
                ))}
                <p>Total: {productSum()}</p>
            </div>
        </div>
    );
}
 
export default RegistrationForm;