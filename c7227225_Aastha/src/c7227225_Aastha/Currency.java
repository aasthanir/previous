package c7227225_Aastha;

public class Currency 
{
	//declaring variables 
	private String name,symbol;
	private double rate;
	
	//adding getter and setter for currency,symbol and rate to use outside this class
	public void setName(String n) 
	{
			name=n;
	}
	public String getName()
	{
		return name;
	}
	
	public void setSymbol(String s) 
	{
			symbol=s;
	}
	public String getSymbol() 
	{
			return symbol;
	}
		
	public void setRate(double r)
	{
			rate=r;
	}
	public double getRate() 
	{
		return rate;
	}
}
