describe('Location Website Test for Iteration 3', function() {
	var PHP1 = 'mySQL1.php';
	var PHP2 = 'mySQL2.php';
	/**
	 * check login in
	 * @return {[type]} [description]
	 */
	describe('Index Page Test', function() {
		var username = "TESTER";
		var password ="group14";
		var invalid_username = "HELLO WORLD";
		var invalid_password = "wrongpass";

		it('invalid username', function() {

			$.ajax({
	            type: 'POST',
	            url:   PHP1,
	            data: {
	                func: 'login',
	                uname: invalid_username,
	                pwd: password
	            },
	            dataType: 'text',
	            success: function(response) {
	                expect(response).toBe('false');
	            }
	        });
		});
		/**
		 * if password doean't match
		 * @return {[type]} [description]
		 */
		it('invalid password', function() {

			$.ajax({
	            type: 'POST',
	            url:   PHP1,
	            data: {
	                func: 'login',
	                uname: username,
	                pwd: invalid_password
	            },
	            dataType: 'text',
	            success: function(response) {
	                expect(response).toBe('false');
	            }
	        });
		});
		/**
		 * if correct username and password are input
		 * @return {[type]} [description]
		 */
		it('correct username/password', function() {

			$.ajax({
	            type: 'POST',
	            url:   PHP1,
	            data: {
	                func: 'login',
	                uname: username,
	                pwd: password
	            },
	            dataType: 'text',
	            success: function(response) {
	                expect(response).toBe('true');
	            }
	        });
		});
	});

	
	describe('Main Page Test', function() {
		var friend_list;
		/**
		 * information display correctly on main page
		 * @return {[type]} [description]
		 */
		it('friend/user names on map match their nicknames', function() {
			$.ajax({
	            type: 'POST',
	            url: PHP2,
	            data: {
	                func: 'get_friend_info',
	                uid: 1
	            },
	            dataType: 'json',
	            success: function(response) {
	                friend_list = eval(response);
	                expect(friend_list[0].nickname).toBe('Hello World');
	                expect(friend_list[1].nickname).toBe('CAI');
	                expect(friend_list[2].nickname).toBe('TSUBASA');
	            }
      		});
		});
		/**
		 * locations matches
		 * @return {[type]} [description]
		 */
		it('friend/user positions on map match their real positions', function() {
			$.ajax({
	            type: 'POST',
	            url: PHP2,
	            data: {
	                func: 'get_friend_info',
	                uid: 1
	            },
	            dataType: 'json',
	            success: function(response) {
	                friend_list = eval(response);
	                expect(friend_list[0].x).toBe(0.3);
	                expect(friend_list[0].x).toBe(0.4);
	                expect(friend_list[0].x).toBe(0.4);

	                expect(friend_list[0].y).toBe(0.5);
	                expect(friend_list[0].y).toBe(0.8);
	                expect(friend_list[0].y).toBe(0.3);
		        }
      		});
		});

	});
	
	describe('Profile Page Test', function() {
		/**
		 * display correct user information
		 * @return {[type]} [description]
		 */
		it('User profile information is loaded correctly', function() {
			$.ajax({
		        type: 'POST',
		        url:  PHP2,
		        data: {
		            func: 'get_profile',
		            uid : 1
		        },
		        dataType: 'json',
		        success: function(response) {
		        	profile = eval(response);
		        	expect(profile[0].username).toBe('TESTER');
		        	expect(profile[0].nickname).toBe('Hello World');
		        	expect(profile[0].points).toBe(1000);
		        	expect(profile[0].position).toBe('country road');

		        }
		    });
		});
		/**
		 * the character information is correct
		 * @return {[type]} [description]
		 */
		it('User character information is loaded correctly', function() {
			$.ajax({
		        type: 'POST',
		        url:  PHP2,
		        data: {
		            func: 'get_profile',
		            uid : 1
		        },
		        dataType: 'json',
		        success: function(response) {
		        	character = eval(response);
		        	expect(character[1].name).toBe('pikachu');
		        	expect(character[1].resource).toBe('pokemon');
		        }
		    });
		});
	});
	
	describe('Social Page Test', function() {
		/**
		 * The friend list is loaded correctly
		 * @return {[type]} [description]
		 */
		it('the friend list is loaded correctly', function() {
			$.ajax({
		        type: 'POST',
		        url:  PHP2,
		        data: {
		            func: 'get_friend_list',
		            uid : 1
		        },
		        dataType: 'json',
		        success: function(response) {
		            friends = eval(response);

		            expect(friends[0].name, 'CAI');
		            expect(friends[1].name, 'TSUBASA');
		        }
			});
		});
	});	

	describe('Friends Management Test', function() {
		/**
		 * search friends function works correctly
		 * @return {[type]} [description]
		 */
		it('User is able to search and add new friend', function() {
			$.ajax({
	            type: 'POST',
	            url:  PHP2,
	            data: {
	                func:  'search_friend',
	                uid:   1,
	                fname: 'RICHARD'
	            },
	            dataType: 'text',
	            success: function(response) {
	                expect(response, 'added successful');
	            }
      	    });
		});
		/**
		 * delete friends
		 * @return {[type]} [description]
		 */
		it('User is able to delete friends', function() {
			$.ajax({
                type: 'POST',
                url:  PHP2,
                data: {
                    func: 'delete_friend',
                    uid: 1,
                    fname: 'RICHARD'
                },
                dataType: 'text',
                success: function(response) {
                   expect(response, 'true');
                }
            });
		});
	});
});