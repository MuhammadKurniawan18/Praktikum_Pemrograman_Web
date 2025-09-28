// Toggle Overview section
const toggleBtn = document.getElementById("toggleOverview");
const overviewSection = document.getElementById("overview");

toggleBtn.addEventListener("click", () => {
  if (overviewSection.style.display === "none") {
    overviewSection.style.display = "block";
    toggleBtn.textContent = "Sembunyikan Overview";
  } else {
    overviewSection.style.display = "none";
    toggleBtn.textContent = "Tampilkan Overview";
  }
});

// Tambah Mata Kuliah
const addCourseBtn = document.getElementById("addCourse");
const courseInput = document.getElementById("newCourse");
const mataKuliahList = document.getElementById("mataKuliahList");

addCourseBtn.addEventListener("click", () => {
  const courseName = courseInput.value.trim();
  if (courseName !== "") {
    const newLi = document.createElement("li");
    newLi.textContent = courseName;
    newLi.className = "card card-featured";
    mataKuliahList.appendChild(newLi);
    courseInput.value = "";
  } else {
    alert("Isi nama mata kuliah dulu!");
  }
});

// Highlight jadwal hari ini
const highlightBtn = document.getElementById("highlightBtn");
const scheduleTable = document.getElementById("scheduleTable");

highlightBtn.addEventListener("click", () => {
  const today = new Date().getDay(); // 0=minggu,1=senin,...
  const rows = scheduleTable.querySelectorAll("tbody tr");

  rows.forEach((row) => {
    row.classList.remove("highlight");
  });

  if (today >= 1 && today <= 5) {
    rows[today - 1].classList.add("highlight");
  } else {
    alert("Hari ini tidak ada jadwal kuliah!");
  }
});

// Dark Mode
const darkModeToggle = document.getElementById("darkModeToggle");
darkModeToggle.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");
});
