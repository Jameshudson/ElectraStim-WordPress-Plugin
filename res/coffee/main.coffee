@Module = do ->

  percentTag = "percentHolder"
  tableData = "table-data"

  init = () ->
    parcentInput = document.getElementById percentTag
    parcentInput.addEventListener "input", ()->
      parcent = parcentInput.value

      tableSells = document.getElementsByClassName "sales_prices"
      tablePrice = document.getElementsByClassName "prices"

      prices = []
      sellsprices = []

      for i in tablePrice
        prices.push i.childNodes[0].innerHTML

      for i, index in tableSells
        sellsprices.push i.childNodes[0].innerHTML

      for i in prices.length
        console.log ((prices[i] / 100) * sellsprices[i])

  init: init

Module.init()