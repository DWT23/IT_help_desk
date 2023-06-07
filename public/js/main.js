function toggleSubnav(index) {
    let subnav = document.getElementById(`subnav${index}`);
    let angle = document.getElementById(`angle${index}`);
    let dropdowns = document.querySelectorAll(".dropdown");

    // dropdowns.forEach(function (dropdown) {
    //     if (!dropdown.classList.contains("hidden")) dropdown.classList.add("hidden");
    //     else(dropdown.classList.contains("hidden")) {

    //     }
    // });
    angle && angle.classList.toggle("rotate-90");
    subnav.classList.toggle("hidden");
}

function toggleElement(elementId) {
    let element = document.getElementById(elementId);

    element.classList.toggle("hidden");
}

function checkTextarea() {
    let textarea = document.getElementById("focusLabel");
    if (textarea.innerText.length > 0) {
        textarea.classList.add("focusLabel");
    } else {
        textarea.classList.remove("focusLabel");
    }
}

function thumb() {
    let creatorInfo = document.getElementById("creatorInfo");
    creatorInfo.classList.toggle("absolute");
    creatorInfo.classList.toggle("top-0");
}

// document.body.addEventListener("click", function (event) {
//     console.log(event.target);

//     // dropdowns.forEach(function (dropdown) {
//     //     if (!dropdown.classList.contains("hidden")) {
//     //         dropdown.classList.add("hidden");
//     //     }
//     // });
// });

// CHat
// $(function () {
//     scrollMsgBottom();
// });

// function scrollMsgBottom() {
//     var d = $(".message-holder");
//     d.scrollTop(d.prop("scrollHeight"));
// }

// function getImages() {
//     const imgs = {
//         Mary: "mary.jpg",
//         Jon: "jon.jpg",
//         Alex: "alex.jpg",
//     };

//     return imgs;
// }

// $(function () {
//     var conn = new WebSocket(`ws://localhost:8080?access_token=<?= session()->get('id') ?>`);
//     conn.onopen = function (e) {
//         console.log("Connection established!");
//     };

//     conn.onmessage = function (e) {
//         console.log(e.data);

//         var data = JSON.parse(e.data);

//         if ("users" in data) {
//             updateUsers(data.users);
//         } else if ("message" in data) {
//             newMessage(data);
//         }
//     };

//     $("#send").on("click", function () {
//         var msg = $("#message-input").val();
//         if (msg.trim() == "") return false;
//         conn.send(msg);
//         myMessage(msg);
//         $("#message-input").val("");
//     });
// });

// function newMessage(msg) {
//     const imgs = getImages();

//     html =
//         `<div class="col-8 msg-item left-msg">
//                     <div class="msg-img">
//                       <img class="img-thumbnail rounded-circle" src="/assets/img/` +
//         imgs[msg.author] +
//         `">
//                     </div>
//                     <div class="msg-text">
//                       <span class="author">` +
//         msg.author +
//         `</span> <span class="time">` +
//         msg.time +
//         `</span><br>
//                       <p>` +
//         msg.message +
//         `</p>
//                     </div>
//                   </div>`;
//     $("#messages").append(html);
//     scrollMsgBottom();
// }

// function myMessage(msg) {
//     var name = `<?= session()->get('firstname') ?>`;
//     const imgs = getImages();
//     var date = new Date();
//     var minutes = date.getMinutes();
//     var hour = date.getHours();
//     var time = hour + ":" + minutes;
//     html =
//         `<div class="col-8 msg-item right-msg offset-4">
//                     <div class="msg-img">
//                       <img class="img-thumbnail rounded-circle" src="/assets/img/` +
//         imgs[name] +
//         `">
//                     </div>
//                     <div class="msg-text">
//                       <span class="author">Me</span> <span class="time">` +
//         time +
//         `</span><br>
//                       <p>` +
//         msg +
//         `</p>
//                     </div>
//                   </div>`;
//     $("#messages").append(html);
//     scrollMsgBottom();
// }

// function updateUsers(users) {
//     var html = "";
//     var myId = `<?= session()->get('id') ?>`;

//     for (let index = 0; index < users.length; index++) {
//         if (myId != users[index].c_user_id)
//             html += '<li class="list-group-item">' + users[index].c_name + "</li>";
//     }

//     if (html == "") {
//         html = "<p>The Chat Room is Empty</p>";
//     }

//     $("#user-list").html(html);
// }
