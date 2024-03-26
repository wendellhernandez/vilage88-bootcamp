$(document).ready(function(){
    const socket = io();
    /*
        Docu: Ask for the player name and add it to the server
        Owner: Wendell
    */
    let name = prompt('What is your name?');
    let current_block_color = 'brick';

    socket.emit('new_player' , name);
    /*
        Docu: Socket listner on player connection
        Owner: Wendell
    */
    socket.on('add_new_player' , function(data){
        /*
            Docu: Puts the player name on the players list
            Owner: Wendell
        */
        $('#players').html('');
        
        for(const player of data.players){
            if(player.id == socket.id){
                $('#players').append(`<p>${player.name} (You)</p>`);
            }else{
                $('#players').append(`<p>${player.name}</p>`);
            }
        }
        /*
            Docu: Puts the player cursor on the canvas
            Owner: Wendell
        */
        $('#cursors').html('');

        for(const player of data.players){
            
            if(player.id == socket.id){
                $('#cursors').append(`
                    <div class="player" id="${player.id}">
                        <img src="/image/cursor.webp">
                        <div class="name">${player.name} (You)</div>
                    </div>`);
            }else{
                $('#cursors').append(`
                    <div class="player" id="${player.id}">
                        <img src="/image/cursor.webp">
                        <div class="name">${player.name}</div>
                    </div>`);
            }
        }
        /*
            Docu: Adds all the block that was made by the other players on connection
            Owner: Wendell
        */
        for(const block of data.blocks){
            $('#canvas').append(`<div class="block ${block.block_color}" style="left:${block.x_axis}px;top:${block.y_axis}px"></div>`);
        }
    })
    /*
        Docu: Updates the cursor location on the client
        Owner: Wendell
    */
    socket.on('update_client_player' , function(players){
        for(const player of players){
            $(`#${player.id}`).css({'left' : player.x_axis , 'top' : player.y_axis});
        }
    })
    /*
        Docu: Adds all blocks made by players
        Owner: Wendell
    */
    socket.on('update_client_block' , function(blocks){
        for(const block of blocks){
            $('#canvas').append(`<div class="block ${block.block_color}" style="left:${block.x_axis}px;top:${block.y_axis}px"></div>`);
        }
    })
    /*
        Docu: Clears the canvas
        Owner: Wendell
    */
    socket.on('clear_canvas_client' , function(){
        $('#canvas').html('');
    })

    socket.on('player_disconnect' , function(data){
        /*
            Docu: Updated the player name on the players list on disconnect
            Owner: Wendell
        */
        $('#players').html('');
    
        for(const player of data.players){
            if(player.id == socket.id){
                $('#players').append(`<p>${player.name} (You)</p>`);
            }else{
                $('#players').append(`<p>${player.name}</p>`);
            }
        }
        /*
            Docu: Updated the player cursor on the canvas on disconnect
            Owner: Wendell
        */
        $('#cursors').html('');

        for(const player of data.players){
            
            if(player.id == socket.id){
                $('#cursors').append(`
                    <div class="player" id="${player.id}">
                        <img src="/image/cursor.webp">
                        <div class="name">${player.name} (You)</div>
                    </div>`);
            }else{
                $('#cursors').append(`
                    <div class="player" id="${player.id}">
                        <img src="/image/cursor.webp">
                        <div class="name">${player.name}</div>
                    </div>`);
            }
        }
    })
    /*
        Docu: Updates servers when mouse is moving in the canvas
        Owner: Wendell
    */
    $('#canvas_container').mousemove(function(e){
        let x_axis = e.offsetX;
        let y_axis = e.offsetY;

        socket.emit('update_server_player' , {x_axis , y_axis})
    })
    /*
        Docu: Adds block in the server
        Owner: Wendell
    */
    $('#canvas_container').click(function(e){
        let x_axis = e.offsetX;
        let y_axis = e.offsetY;

        socket.emit('update_server_block' , {x_axis , y_axis , current_block_color});
    })
    /*
        Docu: Change current block color when button is clicked
        Owner: Wendell
    */
    $('button').click(function(){
        current_block_color = $(this).attr('class');
    })
    /*
        Docu: sends clear canvas event to the server and changes the current block color to brick
        Owner: Wendell
    */
    $('#clear').click(function(){
        current_block_color = 'brick';

        socket.emit('clear_canvas_server');
    })
})