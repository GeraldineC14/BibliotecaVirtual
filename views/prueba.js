function onKeyUp(currentInput, nextInput) {
    if (currentInput.value.length == currentInput.maxLength) {
      document.getElementById(nextInput).focus();
    }
  }