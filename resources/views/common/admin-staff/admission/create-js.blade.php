<script type="text/javascript">
	$(document).ready(function() {
        calculateTotal();
        $(document).on("input", ".amount", function(){
            calculateTotal();
        });
    });
    $(document).ready(function() {
        calculateFreeTotal();
        $(document).on("input", ".free-amount", function(){
            calculateFreeTotal();
        });
    });
    calculateTotal = function(){
        console.log("calculateTotal is calling.");
        var sum = 0;
        $(".amount").each(function(){
            var amount = parseFloat($(this).val());
            if(isNaN(amount)){
                amount = 0;
            }
            sum += amount;
        });
        $("#total_amount").val(sum);
    }
    calculateFreeTotal = function(){
        console.log("calculateFreeTotal is calling.");
        var sum = 0;
        $(".free-amount").each(function(){
            var amount = parseFloat($(this).val());
            if(isNaN(amount)){
                amount = 0;
            }
            sum += amount;
        });
        $("#free_total").val(sum);
    }
</script>