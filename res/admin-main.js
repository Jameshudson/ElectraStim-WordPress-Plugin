// Generated by CoffeeScript 1.10.0
(function() {
  this.Model = (function() {
    var calculatorPrice, clonePrices, defultSalesValues, defultValues, init, priceInputFields, resetPrices, resetSalesPrices, salePriceInputFields, updatePricesByFixedAmount, updatePricesByPercentage;
    priceInputFields = null;
    salePriceInputFields = null;
    defultValues = null;
    defultSalesValues = null;
    init = function() {
      priceInputFields = document.getElementById('product_list-page-priceTable').getElementsByTagName('input');
      salePriceInputFields = document.getElementById('product_list-page-salePriceTable').getElementsByTagName('input');
      return defultValues = clonePrices(priceInputFields);
    };
    calculatorPrice = function(price, percent) {
      return (price / 100) * percent;
    };
    updatePricesByPercentage = function(percent) {
      var i, j, len, results;
      results = [];
      for (j = 0, len = priceInputFields.length; j < len; j++) {
        i = priceInputFields[j];
        results.push(i.value = i.value - calculatorPrice(i.value, percent));
      }
      return results;
    };
    updatePricesByFixedAmount = function(amount) {
      var i, j, len, results;
      results = [];
      for (j = 0, len = priceInputFields.length; j < len; j++) {
        i = priceInputFields[j];
        results.push(i.value = i.value - amount);
      }
      return results;
    };
    resetPrices = function() {
      var i, j, len, results;
      alert(defultValues.length);
      results = [];
      for (j = 0, len = defultValues.length; j < len; j++) {
        i = defultValues[j];
        alert(i.value);
        results.push(priceInputFields.value = i.value);
      }
      return results;
    };
    resetSalesPrices = function() {
      var i, j, len, results;
      results = [];
      for (j = 0, len = defultSalesValues.length; j < len; j++) {
        i = defultSalesValues[j];
        results.push(salePriceInputFields.value = i.value);
      }
      return results;
    };
    clonePrices = function(priceInput) {
      var i, j, len, resutls;
      resutls = [];
      for (j = 0, len = priceInput.length; j < len; j++) {
        i = priceInput[j];
        resutls.push = i.value;
      }
      return resutls;
    };
    return {
      init: init,
      calculatorPrice: calculatorPrice,
      clonePrices: clone,
      updatePricesByPercentage: updatePricesByPercentage,
      updatePricesByFixedAmount: updatePricesByFixedAmount,
      resetPrices: resetPrices,
      resetSalesPrices: resetSalesPrices
    };
  })();

  this.Presenter = (function() {
    var amountField, init, priceTypeField, priceTypeFieldInputHandler, reduceTypeField, reduceTypeFieldInputHandler, resetButton, resetButtonInputHandler, updateButton, updateButtonInputHandler;
    amountField = null;
    priceTypeField = null;
    reduceTypeField = null;
    updateButton = null;
    resetButton = null;
    window.onload = function() {
      Model.init();
      return init();
    };
    init = function() {
      amountField = document.getElementById("amount");
      priceTypeField = document.getElementById("priceType");
      reduceTypeField = document.getElementById("reduceType");
      updateButton = document.getElementById("updatePrices");
      resetButton = document.getElementById("resetPrices");
      priceTypeField.addEventListener("click", reduceTypeFieldInputHandler);
      reduceTypeField.addEventListener("click", reduceTypeFieldInputHandler);
      updateButton.addEventListener("click", updateButtonInputHandler);
      return resetButton.addEventListener("click", resetButtonInputHandler);
    };
    resetButtonInputHandler = function() {
      return Model.resetPrices();
    };
    updateButtonInputHandler = function() {
      if (reduceTypeField[reduceTypeField.selectedIndex].value === "by %") {
        return Model.updatePricesByPercentage(amountField.value);
      } else {
        return Model.updatePricesByFixedAmount(amountField.value);
      }
    };
    reduceTypeFieldInputHandler = function() {};
    return priceTypeFieldInputHandler = function() {};
  })();

}).call(this);
