// Modal functions for Tailwind CSS
function openModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.remove("hidden");
    modal.classList.add("flex");
    document.body.style.overflow = "hidden";

    if (!modalId.includes("update")) {
      const form = modal.querySelector("form");
      if (form) {
        form.reset();
      }
    }
  }
}

function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
    document.body.style.overflow = "auto";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  // Tab switching functionality
  const navLinks = document.querySelectorAll("[data-tab]");
  const tabContents = document.querySelectorAll(".tab-content");

  navLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();

      // Remove active states from all tabs
      navLinks.forEach((navLink) => {
        navLink.classList.remove("bg-primary", "text-white");
        navLink.classList.add("text-gray-300");
      });

      // Add active state to clicked tab
      this.classList.remove("text-gray-300");
      this.classList.add("bg-primary", "text-white");

      const targetTab = this.getAttribute("data-tab");

      // Hide all tab contents
      tabContents.forEach((content) => {
        content.classList.add("hidden");
        content.classList.remove("block");
      });

      // Show target tab content
      const targetContent = document.getElementById(targetTab + "-tab");
      if (targetContent) {
        targetContent.classList.remove("hidden");
        targetContent.classList.add("block");
      }
    });
  });

  // Modal close on outside click
  document.addEventListener("click", function (e) {
    if (
      e.target.classList.contains("fixed") &&
      e.target.classList.contains("inset-0")
    ) {
      const modal = e.target.querySelector('[id$="Modal"]');
      if (modal) {
        closeModal(modal.id);
      }
    }
  });

  // Modal close on Escape key
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
      document
        .querySelectorAll('[id$="Modal"]:not(.hidden)')
        .forEach((modal) => {
          closeModal(modal.id);
        });
    }
  });
});

// Functions to handle update and delete modals
function updateOrder(orderId) {
  // Get order data from the table row
  const row = document.querySelector(`tr[data-order-id="${orderId}"]`);
  if (!row) return;

  const cells = row.querySelectorAll("td");
  const customerName = cells[1].textContent;
  const amount = cells[3].textContent.replace("$", "");
  const items = cells[4].textContent;
  const status = cells[5].textContent.trim();

  // Populate the update modal
  document.getElementById("updateOrderId").value = orderId;
  document.getElementById("updateOrderCustomer").value = customerName;
  document.getElementById("updateOrderAmount").value = amount;
  document.getElementById("updateOrderItems").value = items;
  document.getElementById("updateOrderStatus").value = status.toLowerCase();

  openModal("updateOrderModal");
}

function deleteOrder(orderId) {
  const row = document.querySelector(`tr[data-order-id="${orderId}"]`);
  if (!row) return;

  const orderInfo = row.querySelector("td:first-child").textContent;
  document.getElementById("deleteOrderId").value = orderId;
  document.getElementById("deleteOrderInfo").textContent = orderInfo;

  openModal("deleteOrderModal");
}

function updateCustomer(customerId) {
  const row = document.querySelector(`tr[data-customer-id="${customerId}"]`);
  if (!row) return;

  const cells = row.querySelectorAll("td");
  const name = cells[1].textContent;
  const email = cells[2].textContent;
  const phone = cells[3].textContent;

  document.getElementById("updateCustomerId").value = customerId;
  document.getElementById("updateCustomerName").value = name;
  document.getElementById("updateCustomerEmail").value = email;
  document.getElementById("updateCustomerPhone").value = phone;

  openModal("updateCustomerModal");
}

function deleteCustomer(customerId) {
  const row = document.querySelector(`tr[data-customer-id="${customerId}"]`);
  if (!row) return;

  const customerInfo = row.querySelector("td:nth-child(2)").textContent;
  document.getElementById("deleteCustomerId").value = customerId;
  document.getElementById("deleteCustomerInfo").textContent = customerInfo;

  openModal("deleteCustomerModal");
}

function updateStudent(studentId) {
  const row = document.querySelector(`tr[data-student-id="${studentId}"]`);
  if (!row) return;

  const cells = row.querySelectorAll("td");
  const name = cells[1].textContent;
  const email = cells[2].textContent;
  const course = cells[3].textContent;
  const year = cells[4].textContent;
  const gpa = cells[5].textContent.trim();

  document.getElementById("updateStudentId").value = studentId;
  document.getElementById("updateStudentName").value = name;
  document.getElementById("updateStudentEmail").value = email;
  document.getElementById("updateStudentCourse").value = course;
  document.getElementById("updateStudentYear").value = year;
  document.getElementById("updateStudentGpa").value = gpa;

  openModal("updateStudentModal");
}

function deleteStudent(studentId) {
  const row = document.querySelector(`tr[data-student-id="${studentId}"]`);
  if (!row) return;

  const studentInfo = row.querySelector("td:nth-child(2)").textContent;
  document.getElementById("deleteStudentId").value = studentId;
  document.getElementById("deleteStudentInfo").textContent = studentInfo;

  openModal("deleteStudentModal");
}
