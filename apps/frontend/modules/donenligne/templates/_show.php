<?php if(Config::getInstance()->get('donenligne')):?>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type='text' value="<?php echo $montant;?>" name="amount" size="1"/>€
<input name="currency_code" type="hidden" value="EUR" />
<input name="shipping" type="hidden" value="0.00" />
<input name="tax" type="hidden" value="0.00" />
<input name="cmd" type="hidden" value="_donations" />
<input name="business" type="hidden" value="lauren_1304357296_biz@hotmail.com" />
<input name="item_name" type="hidden" value="Graine de Vie" />
<input name="no_note" type="hidden" value="1" />
<input name="lc" type="hidden" value="FR" />
<input name="bn" type="hidden" value="PP-BuyNowBF" />
<input name="custom" type="hidden" value="ID_ACHETEUR" />
<input alt="Effectuez vos paiements via PayPal : une solution rapide, gratuite et sécurisée" name="submit" src="https://www.sandbox.paypal.com/WEBSCR-640-20110401-1/fr_FR/FR/i/btn/btn_donate_LG.gif" type="image" /><img src="https://www.sandbox.paypal.com/WEBSCR-640-20110401-1/fr_FR/i/scr/pixel.gif" border="0" alt="" width="1" height="1" />
</form>
<?php endif; ?>