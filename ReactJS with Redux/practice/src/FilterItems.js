const FilterItems = ({filter , setFilter}) => {
    return (  
        <form onSubmit={e => e.preventDefault()}>
            <input 
                type="text" 
                placeholder="filter"
                value={filter}
                onChange={e => setFilter(e.target.value)}
            />
        </form>
    );
}
 
export default FilterItems;