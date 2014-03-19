package genericgame1067;

public class Character {

    //attributes
    private int charaId; //character id
    private int accountId; //account id
    private String charaName; //character's name
    private int dailyPoint; //character's daily point
    private String picture; //character's picture(stored file name)

    //empty constructor
    public Character()
    {
    }

    //constructor w/ parameter
    public Character(int charaId, int accountId, String charaName, 
        int dailyPoint, String picture)
    {
    	this.charaId=charaId;
    	this.accountId=accountId;
    	this.charaName=charaName;
    	this.dailyPoint=dailyPoint;
	this.picture=picture;
    }

    public int getAccountID(){
	return accountId;
    }
	
    public int getCharaId() {
	return charaId;
    }
    public void setCharaId(int charaId) {
	this.charaId = charaId;
    }
    public void setAccountId(int accountId) {
	this.accountId=accountId;
    }
    public String getCharaName() {
	return charaName;
    }

    public void setCharaName(String charaName) {
	this.charaName = charaName;
    }

    public int getDailyPoint() {
	return dailyPoint;
    }

    public void setDailyPoint(int dailyPoint) {
	this.dailyPoint = dailyPoint;
    }

    public String getPicture() {
	return picture;
    }

    public void setPicture(String picture) {
    	this.picture = picture;
    }
    @Override
    public String toString() {
    	return "Character [charaId=" + charaId + ", accountId=" + accountId
        	+ ", charaName=" + charaName + ", dailyPoint=" + dailyPoint
		+ ", picture=" + picture + "]";
    }

}
