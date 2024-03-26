import ListGroup from 'react-bootstrap/ListGroup';
import UserImage from './assets/images/user.png';

const Contacts = () => {
    let users = [
        {nickname: 'MDL', name: 'Monkey D. Luffy', email: 'luffy@microsoft.com'}
    ];
    
    return (  
        <ListGroup style={{marginTop: '20px'}}>
            <ListGroup.Item active>Contacts</ListGroup.Item>
            {
                users.map((user) => (
                    <ListGroup.Item className="user">
                        <img src={UserImage} alt="user" />
                        <div className="details">
                            <div className="name"><span>{user.name}</span></div>
                            <a href="google.com">{user.email}</a>
                        </div>
                    </ListGroup.Item>
                ))
            }
        </ListGroup>
    );
}
 
export default Contacts;