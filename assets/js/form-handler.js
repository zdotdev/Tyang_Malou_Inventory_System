document.addEventListener('DOMContentLoaded', function () {
  // Select the input field using the form name and field name
  const employeeNameInput = document.querySelector(
    'input[name="sales[employee_name]"]'
  )

  if (employeeNameInput) {
    const storedUsername = localStorage.getItem('username')
    console.log('storedUsername', storedUsername)

    if (storedUsername) {
      // Set the value
      employeeNameInput.value = storedUsername
      // Trigger change event
      employeeNameInput.dispatchEvent(new Event('change'))
      // Make the field readonly
      employeeNameInput.setAttribute('readonly', 'readonly')
    }
  }
})
