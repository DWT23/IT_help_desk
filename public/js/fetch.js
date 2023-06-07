(function () {
    let selectOrganization = document.getElementById("organizations");
    let selectContact = document.querySelector(".employees");
    let selectAssigned = document.querySelector(".assigned");

    [selectOrganization, selectContact, selectAssigned].forEach((element, i) => {
        let attrName = element.getAttribute("id");
        let tableName = i === 0 ? "organizations" : "employees";
        element.addEventListener("focus", function () {
            fetch(`/fetch/${tableName}`)
                .then(response => response.json())
                .then(data => {
                    const firstOption = document.createElement("option");
                    let titleElement = "";
                    element.innerHTML = "";
                    if (i === 0) titleElement = `Select ${capitalizeFirstLetter(attrName)}`;
                    else if (i === 1) titleElement = "Select Contact";
                    else if (i === 2) titleElement = "Assigned By:";

                    firstOption.textContent = titleElement;
                    firstOption.setAttribute("selected", true);
                    firstOption.setAttribute("disabled", true);
                    element.appendChild(firstOption);

                    data.forEach(row => {
                        const option = document.createElement("option");
                        let nameField = "name",
                            id = "id";
                        if (attrName === "employees" || attrName === "assigned") {
                            id = "nip";
                            nameField = "fullname";
                        }

                        option.value = row[id];
                        option.textContent = row[nameField];
                        element.appendChild(option);
                    });
                })
                .catch(error => {
                    console.log("Error:", error);
                });
        });
    });

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
})();

function showTicket(id) {
    let staticChat = document.getElementById("staticChat");
    staticChat.classList.toggle("hidden");

    $.ajax({
        url: `/ticket/${id}`,
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
            let ticketId = document.getElementById("ticketId");
            let ticketName = document.getElementById("ticketName");
            let ticketCreatorImg = document.querySelectorAll(".ticketCreatorImg");
            let ticketCreatorName = document.querySelectorAll(".ticketCreatorName");
            let ticketCreatorNip = document.getElementById("ticketCreatorNip");
            let ticketDescription = document.getElementById("ticketDescription");
            ticketId.innerHTML = data.id;
            ticketName.innerHTML = data.summary;
            ticketCreatorImg.forEach(element => {
                element.src = `/img/uploads/${data.photo}`;
            });
            ticketCreatorName.forEach(element => {
                element.innerHTML = data.fullname;
            });
            ticketCreatorNip.value = data.nip;
            ticketDescription.innerHTML = data.description;

            getChatTemplate(ticketId.innerHTML);
            sideChat(data);
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

function getChatTemplate(id) {
    $.ajax({
        method: "GET",
        url: `/api/chat/${id}`,
        dataType: "json",
        headers: {
            "Content-Type": "application/json",
        },
        success: function (response) {
            let message = $("#message");
            let text = "";
            $.each(response, function (i, value) {
                text += `<div class="flex justify-between mb-4 w-full bg-slate-100 px-5 py-2" id="creatorInfo">
                            <div class="flex">
                                <img src="img/uploads/${value.photo}" class="object-cover h-8 w-8 rounded-full ticketCreatorImg" />
                                <div class="ml-2 flex flex-col">
                                    <span class="font-semibold">${value.fullname}</span>
                                    <p>${value.message}</p>
                                </div>
                            </div>
                        </div>`;
            });
            message.html(text);
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

function sideChat(data) {
    let organization = $("#attrOrganizations");
    let contact = $("#attrContact");
    let assigne = $("#attrAssignee");
    let status = $("#attrStatus");
    let priorty = $("#attrPriority");
    let dueDate = $("#attrDueDate");
    let category = $("#attrCategory");

    organization.val(data.name);
    contact.val(data.fullname);
    assigne.val(data.fullname);
    status.val(data.status);
    priorty.val(data.priority);
    dueDate.val(data.due_date);
    category.val(data.category);
}

(function () {
    $("#formChat").submit(function (e) {
        e.preventDefault();
        let ticketId = $("#ticketId").text();
        let ticketCreatorNip = $("#ticketCreatorNip").val();
        let chatValue = $("#chat");
        let csrf = $("#csrf");

        getChatTemplate(ticketId);

        $.ajax({
            url: `/api/chat`,
            method: "POST",
            data: {
                ticket_id: ticketId,
                sender_id: ticketCreatorNip,
                message: chatValue.val(),
            },
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": csrf.val(),
            },
            success: function (response) {
                getChatTemplate(ticketId);
                chatValue.val("");
                csrf.val(response);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    });
})();
