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
public class LocationTest {
    
    @Test
    public void LocationTest() {
        Location l = new Location(50.5, 40.0);
        assertEquals(50.5, l.getLatitude(), 0);
        assertEquals(40.0, l.getLongitude(), 0);
    }
}
