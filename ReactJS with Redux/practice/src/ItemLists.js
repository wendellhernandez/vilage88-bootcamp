import { useState } from 'react';
import AddItems from './AddItems';
import FilterItems from './FilterItems';


const Header = () => {
    const [lists , setLists] = useState(JSON.parse(localStorage.getItem('myList')));

    const [filter , setFilter] = useState('');

    const filteredList = lists.filter((list) => {
        return ((list.name).toLowerCase()).includes(filter.toLowerCase());
    })

    const setAndStore = (list) => {
        setLists(list);
        localStorage.setItem('myList' , JSON.stringify(list));
    }

    const handleChange = (id) => {
        const newLists = lists.map((list) => {
            if(list.id === id){
                return {...list , checked: !list.checked};
            }else{
                return list;
            }
        })

        setAndStore(newLists);
    }

    const handleDelete = (id) => {
        const newLists = lists.filter((list) => {
            return list.id !== id;
        })

        setAndStore(newLists);

    }

    return (  
        <header className="App-header">
            <AddItems 
                lists={lists} 
                setLists={setLists}
            />

            <FilterItems 
                filter={filter}
                setFilter={setFilter}
            />

            <ul>
            {filteredList.map((list) => (
                <li key={list.id}>
                    <input 
                        type="checkbox" 
                        checked={list.checked}
                        onChange={() => handleChange(list.id)}
                    />
                    <label>{list.name}</label>
                    <button onClick={() => handleDelete(list.id)}>delete</button>
                </li>
            ))}
            </ul>
        </header>
    );
}
 
export default Header;