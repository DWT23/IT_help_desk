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

    let rowTicket = document.getElementById("rowTicket");
    let ticketId = rowTicket.dataset.ticket;
})();

function showTicket(id) {
    let staticChat = document.getElementById("staticChat");
    staticChat.classList.toggle("hidden");

    fetch(`/ticket/${id}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            let ticketId = document.getElementById("ticketId");
            let ticketName = document.getElementById("ticketName");
            let ticketCreatorImg = document.querySelectorAll(".ticketCreatorImg");
            let ticketCreatorName = document.querySelectorAll(".ticketCreatorName");
            let ticketDescription = document.getElementById("ticketDescription");
            ticketId.innerHTML = data.id;
            ticketName.innerHTML = data.summary;
            ticketCreatorImg.forEach(element => {
                element.src = `/img/uploads/${data.photo}`;
            });
            ticketCreatorName.forEach(element => {
                element.innerHTML = data.fullname;
            });
            ticketDescription.innerHTML = data.description;
        })
        .catch(error => {
            console.error("Terjadi kesalahan:", error);
        });
}
