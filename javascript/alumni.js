// Utility functions
const $ = (selector) => document.querySelector(selector);
const $$ = (selector) => document.querySelectorAll(selector);

// State management
let alumniProfiles = [];

// DOM Elements
const profileGrid = $("#profileGrid");
const addProfileButton = $("#addProfileButton");
const formModal = $("#formModal");
const personalDataModal = $("#personalDataModal");
const alumniForm = $("#alumniForm");
const personalDataForm = $("#personalDataForm");
const closeModalButtons = $$(".close-modal");
const cancelButton = $("#cancelButton");

// Local Storage functions
const saveData = () => {
    try {
        localStorage.setItem("alumniData", JSON.stringify(alumniProfiles));
    } catch (error) {
        console.error("Error saving data to localStorage:", error);
    }
};

const loadData = () => {
    try {
        const data = localStorage.getItem("alumniData");
        if (data) {
            alumniProfiles = JSON.parse(data);
        }
    } catch (error) {
        console.error("Error loading data from localStorage:", error);
        alumniProfiles = [];
    }
};

// CRUD Operations
const createProfile = (profile) => {
    const newId = alumniProfiles.length ? Math.max(...alumniProfiles.map(p => p.id)) + 1 : 0;
    alumniProfiles.push({ id: newId, ...profile });
    saveData();
    renderProfiles();
};

const updateProfile = (id, updatedProfile) => {
    const index = alumniProfiles.findIndex(profile => profile.id === id);
    if (index !== -1) {
        alumniProfiles[index] = { ...alumniProfiles[index], ...updatedProfile };
        saveData();
        renderProfiles();
    }
};

const deleteProfile = (id) => {
    alumniProfiles = alumniProfiles.filter(profile => profile.id !== id);
    saveData();
    renderProfiles();
};

// UI Functions
const editProfile = (id) => {
    const profile = alumniProfiles.find(profile => profile.id === id);
    if (profile) {
        $("#profileId").value = id;
        $("#alumniName").value = profile.name;
        $("#alumniMajor").value = profile.major;
        $("#alumniYear").value = profile.year;
        $("#alumniJob").value = profile.job;

        const previewContainer = $("#previewContainer");
        previewContainer.innerHTML = profile.photoUrl ? `<img src="${profile.photoUrl}" alt="Preview Image" id="previewImage">` : "";
        showModal(formModal);
    }
};

const previewPhoto = (event) => {
    const previewContainer = $("#previewContainer");
    previewContainer.innerHTML = "";

    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const imgElement = document.createElement("img");
            imgElement.src = e.target.result;
            imgElement.alt = "Preview Image";
            imgElement.id = "previewImage";
            previewContainer.appendChild(imgElement);
        };
        reader.readAsDataURL(file);
    }
};

const addOrUpdateProfile = (event) => {
    event.preventDefault();
    const id = $("#profileId").value;
    const name = $("#alumniName").value;
    const major = $("#alumniMajor").value;
    const year = $("#alumniYear").value;
    const job = $("#alumniJob").value;

    const previewImage = $("#previewImage");
    const photoUrl = previewImage ? previewImage.src : "";

    if (id) {
        updateProfile(parseInt(id), { name, major, year, job, photoUrl });
    } else {
        createProfile({ name, major, year, job, photoUrl });
    }

    resetForm();
    hideModal(formModal);
};

const resetForm = () => {
    alumniForm.reset();
    $("#profileId").value = "";
    $("#previewContainer").innerHTML = "";
};

const renderProfiles = () => {
    profileGrid.innerHTML = "";

    const fragment = document.createDocumentFragment();
    alumniProfiles.forEach((profile) => {
        const profileElement = document.createElement("div");
        profileElement.className = "profile";
        profileElement.innerHTML = `
            <img src="${profile.photoUrl || "../img/default_avatar.png"}" alt="${profile.name}">
            <h2>${profile.name}</h2>
            <p>Lulusan ${profile.major}, Angkatan ${profile.year}</p>
            <p>Saat ini bekerja sebagai ${profile.job}</p>
            <div class="profile-buttons">
                <button class="edit-btn" data-id="${profile.id}">Edit</button>
                <button class="delete-btn" data-id="${profile.id}">Delete</button>
                <button class="data-btn" data-id="${profile.id}">Data Diri</button>
            </div>
        `;
        fragment.appendChild(profileElement);
    });
    profileGrid.appendChild(fragment);
};

const showModal = (modal) => {
    modal.style.display = "block";
};

const hideModal = (modal) => {
    modal.style.display = "none";
};

const showPersonalDataModal = (id) => {
    // Here you would typically load the personal data for the specific alumni
    // For now, we'll just show the empty form
    showModal(personalDataModal);
};

const submitPersonalData = (event) => {
    event.preventDefault();
    // Here you would typically save the personal data
    // For now, we'll just hide the modal
    hideModal(personalDataModal);
};

// Event Delegation
profileGrid.addEventListener("click", (event) => {
    const target = event.target;
    if (target.classList.contains("edit-btn")) {
        editProfile(parseInt(target.dataset.id));
    } else if (target.classList.contains("delete-btn")) {
        if (confirm("Are you sure you want to delete this profile?")) {
            deleteProfile(parseInt(target.dataset.id));
        }
    } else if (target.classList.contains("data-btn")) {
        showPersonalDataModal(parseInt(target.dataset.id));
    }
});

// Event Listeners
addProfileButton.addEventListener("click", () => showModal(formModal));
closeModalButtons.forEach(button => {
    button.addEventListener("click", () => {
        hideModal(formModal);
        hideModal(personalDataModal);
    });
});
cancelButton.addEventListener("click", () => {
    hideModal(formModal);
    resetForm();
});
alumniForm.addEventListener("submit", addOrUpdateProfile);
personalDataForm.addEventListener("submit", submitPersonalData);
$("#alumniPhoto").addEventListener("change", previewPhoto);

// Close modal when clicking outside
window.addEventListener("click", (event) => {
    if (event.target == formModal) {
        hideModal(formModal);
    }
    if (event.target == personalDataModal) {
        hideModal(personalDataModal);
    }
});

// Initial setup
window.addEventListener("DOMContentLoaded", () => {
    loadData();
    renderProfiles();
});