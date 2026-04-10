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
  // Handle hash in URL to switch tabs
  const hash = window.location.hash.substring(1);
  if (hash) {
    const targetLink = document.querySelector(`[data-tab="${hash}"]`);
    if (targetLink) {
      targetLink.click();
    }
  }

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
function viewDetailOrder(orderId) {
  console.log("viewDetailOrder called with orderId:", orderId);

  // Get order data from the table row
  const row = document.querySelector(`tr[data-order-id="${orderId}"]`);
  if (!row) return;

  const cells = row.querySelectorAll("td");
  const orderInfo = cells[0].textContent;
  const customerName = cells[1].textContent;
  const amount = cells[3].textContent.replace("$", "");
  const items = cells[4].textContent;

  // Populate the view modal
  document.getElementById("viewOrderId").textContent = orderInfo;
  document.getElementById("viewOrderCustomer").textContent = customerName;

  // Generate sample items based on the number of items
  const itemsData = generateSampleItems(parseInt(items), parseFloat(amount));
  const itemsContainer = document.getElementById("viewOrderItems");
  itemsContainer.innerHTML = "";

  itemsData.forEach((item) => {
    const itemDiv = document.createElement("div");
    itemDiv.className = "bg-gray-900 rounded-lg p-3 border border-gray-700";
    itemDiv.innerHTML = `
      <div class="flex justify-between items-start">
        <div class="flex-1">
          <p class="text-white font-medium">${item.name}</p>
          <p class="text-gray-400 text-sm">${item.quantity} x $${item.price.toFixed(2)}</p>
        </div>
        <div class="text-right">
          <p class="text-white font-semibold">$${item.total.toFixed(2)}</p>
        </div>
      </div>
    `;
    itemsContainer.appendChild(itemDiv);
  });

  // Display total
  document.getElementById("viewOrderTotal").textContent =
    `$${parseFloat(amount).toFixed(2)}`;

  openModal("viewOrderDetailsModal");
}

function generateSampleItems(itemCount, totalAmount) {
  const items = [];
  const products = [
    { name: "Laptop Pro", description: "High-performance laptop" },
    { name: "Wireless Mouse", description: "Ergonomic wireless mouse" },
    { name: "USB-C Hub", description: "Multi-port USB hub" },
    { name: "Mechanical Keyboard", description: "RGB mechanical keyboard" },
    { name: "Monitor Stand", description: "Adjustable monitor stand" },
    { name: "Webcam HD", description: "1080p HD webcam" },
    { name: "Desk Lamp", description: "LED desk lamp" },
    { name: "Headphones", description: "Noise-cancelling headphones" },
  ];

  const avgPrice = totalAmount / itemCount;

  for (let i = 0; i < itemCount; i++) {
    const product = products[i % products.length];
    const quantity = Math.floor(Math.random() * 2) + 1;
    const price = avgPrice * (0.8 + Math.random() * 0.4);

    items.push({
      name: product.name,
      description: product.description,
      quantity: quantity,
      price: price,
      total: price * quantity,
    });
  }

  return items;
}

function printOrderDetails() {
  const modalContent = document.querySelector(
    "#viewOrderDetailsModal .bg-gray-800",
  );
  const printWindow = window.open("", "_blank");

  printWindow.document.write(`
    <html>
      <head>
        <title>Order Details</title>
        <style>
          body { font-family: Arial, sans-serif; margin: 20px; }
          .header { border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px; }
          .section { margin-bottom: 20px; }
          .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
          .label { font-weight: bold; color: #666; }
          table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
          th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
          th { background-color: #f5f5f5; }
          .text-right { text-align: right; }
          .total { font-size: 18px; font-weight: bold; }
        </style>
      </head>
      <body>
        <div class="header">
          <h1>Order Details</h1>
        </div>
        ${modalContent.innerHTML}
      </body>
    </html>
  `);

  printWindow.document.close();
  printWindow.print();
}

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
