@Presenter = do ->

	amountField = null
	priceTypeField = null
	reduceTypeField = null

	updateButton = null
	resetButton = null

	window.onload = () ->
		Model.init()
		init()

	init = () ->
		amountField = document.getElementById "amount"
		priceTypeField = document.getElementById "priceType"
		reduceTypeField = document.getElementById "reduceType"

		updateButton = document.getElementById "updatePrices"
		resetButton = document.getElementById "resetPrices"

		# price Type events
		priceTypeField.addEventListener "click", reduceTypeFieldInputHandler
		
		# reduec tpye events
		reduceTypeField.addEventListener "click", reduceTypeFieldInputHandler
		
		# update button events
		updateButton.addEventListener "click", updateButtonInputHandler
		
		# reset button events
		resetButton.addEventListener "click", resetButtonInputHandler

	resetButtonInputHandler = () ->
		Model.resetPrices()
		# Model.resetSalesPrices()
		
	updateButtonInputHandler = () ->

		if reduceTypeField[reduceTypeField.selectedIndex].value == "by %"
			Model.updatePricesByPercentage amountField.value
		else 
			Model.updatePricesByFixedAmount amountField.value

	
	reduceTypeFieldInputHandler = () ->


	priceTypeFieldInputHandler = () ->

		