import { useState } from 'react';

const AddItems = ({lists , setLists}) => {
    const [newItem , setNewItem] = useState('');

    const addNewItem = (name) => {
        const id = lists[lists.length -1].id + 1;
        const newItem = {id , name , checked: false};
        const newList = [...lists , newItem];
        setLists(newList);
        localStorage.setItem('myList' , JSON.stringify(newList));
    }

    const handleSubmit = (e) => {
        e.preventDefault();
        addNewItem(newItem);
        setNewItem('');
    }

    return (  
        <form onSubmit={handleSubmit}>
            <input 
                type="text" 
                placeholder='add item'
                value={newItem}
                onChange={(e) => setNewItem(e.target.value)}
            />
            <button type="submit">Add Item</button>
        </form>
    );
}
 
export default AddItems;