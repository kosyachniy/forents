function change(el)
	  {	
		st = el.nextElementSibling.style.display;	
		if (st=='block') el.nextElementSibling.style.display = 'none';
		else el.nextElementSibling.style.display = 'block';
	  }