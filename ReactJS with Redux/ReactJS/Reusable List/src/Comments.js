const Comments = ({comments}) => {
    return (  
        comments.map((comment) => (
            <div className="comment">
                <img src={comment.image} alt={comment.name}/>
                <div className="details">
                    <div className="name"><span>{comment.name}</span> {comment.date}</div>
                    <p>{comment.message}</p>
                </div>
            </div>
        ))
    );
}
 
export default Comments;