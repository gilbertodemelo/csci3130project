package genericgame1067;



public class Location {

	/** attributes */
	private double latitude;
	private double longitude;


	/** empty constructor */
	public Location(){

	}

	/** constructor with parameters */
	public Location(double latitude, double longitude){
		this.latitude = latitude;
		this.longitude = longitude;
	}

	/** set methods */
	public void setLatitude(double latitude){
		this.latitude = latitude;
	}

	public void setLongitude(double longitude){
		this.longitude = longitude;
	}

	/** get methods */
	public double  getLatitude(){
		return latitude;
	}

	public double getLongitude(){
		return longitude;
	}

} //end of class
