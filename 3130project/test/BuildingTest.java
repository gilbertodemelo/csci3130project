/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author Richard
 */
public class BuildingTest {
    
    @Test
    public void BuildingTest() {
        Building b1 = new Building("CS Building", new Location(5,5));
        assertEquals("CS Building", b1.getBuildingName());
        assertEquals(5.0, b1.buildingLocation("CS Building").getLatitude(), 0);
        assertEquals(5.0, b1.buildingLocation("CS Building").getLatitude(), 0);
    }
}
