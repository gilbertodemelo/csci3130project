public class User
{
	//attributes
	private String user;
	private String password;
	private int totalPoints; //total points accumulated by the user since registering
	private int accountID;
	//constructor
	public User(String username, String pass, int tp, int a)
	{
		user = username;
		password = pass;
		totalPoints = tp;
		accountID = a;
	}
	//get and set methods 
	public int getTotalPoints() {
		return totalPoints;
	}

	public void setTotalPoints(int totalPoints) {
		this.totalPoints = totalPoints;
	}

	public int getAccountID() {
		return accountID;
	}

	public void setAccountID(int accountID) {
		this.accountID = accountID;
	}

	public String getUser() {
		return user;
	}

	public void setUser(String user) {
		this.user = user;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}	
	//to string method
	public String toString()
	{
		return "Username: "+user+", Password: "+password+", Points: "+totalPoints+", Account ID: "+accountID;
	}
}